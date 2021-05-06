import Vue from 'vue'
import '../scss/style.scss'
import Progress from 'vue-multiple-progress'
import gsap from "gsap";

Vue.component('vm-progress', Progress)
Vue.use(Progress)

var app = new Vue({
  el: '#app',
  data() {
    return {
      tl: gsap.timeline({}),
      tlImages: gsap.timeline({ paused: false, delay: 0.3, repeat: -1, }),
      tlStripe: gsap.timeline({ paused: false, delay: 0, repeat: -1, }),
      countDown: 5,
      duration: 5,
      sequence: 2,
      elements: gsap.utils.toArray(".content"),
      firstTime: true
    }
  },
  methods: {
    resetTimer() {
      this.countDown = this.duration
    },
    timer() {
      if (this.countDown > 0) {
        setTimeout(() => {
          this.countDown -= 1
          this.timer()
        }, 1000)
      } else {
        this.countDown = this.duration
        this.timer()
      }
    },
    animationA(i) {
      var content = '.content-' + this.sequence
      var image = '.backImage-' + this.sequence
      gsap.fromTo(content, { x: -100, opacity: 0 }, { x: 0, opacity: 1, duration: 1 })
      gsap.fromTo(image, { scale: 1.2, opacity: 0 }, { scale: 1.1, opacity: 1, duration: 1 })
      gsap.to(content, { x: -100, opacity: 0, duration: 0.5, delay: this.duration })
      gsap.to(image, { scale: 1, opacity: 0, duration: 0.5, delay: this.duration }).then(() => {
        if (this.sequence > 0) {
          this.sequence--
        } else {
          this.sequence = 2
        }
        this.animationA()
      })
    }
  },
 
  computed: {
    timeFraction() {
      const rawTimeFraction = this.countDown / this.duration;
      return rawTimeFraction * 100
    }
  },

  mounted() {
    // console.log(Object.keys(this.elements).length)
    
    this.animationA()
    this.timer()
  }
})
