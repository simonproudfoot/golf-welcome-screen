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
      sequence: 3,
      elements: gsap.utils.toArray(".content")
    }
  },
  methods: {
    resetTimer() {
      console.log('reeset')
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
      gsap.fromTo(image, { scale: 1.1, opacity: 0 }, { scale: 1.0, opacity: 1, duration: 1})
    
      gsap.to(content, { x: -100, opacity: 0, duration: 0.5, delay: this.duration })
      gsap.to(image, { scale: 0.9, opacity: 0, duration: 0.5, delay: this.duration })

    },
    runAnim() {
      // only works for 2
      // this.tl.fromTo('.content', { opacity: 0, x: -30 }, { opacity: 1, x: 0, stagger: this.duration }, "-=0.4").to('.content', { opacity: 0, x: -10, stagger: this.duration }, '=-1')
      // this.tlImages.fromTo('.backImage', { opacity: 0, scale: 1.2 }, { opacity: 1, scale: 1.1, stagger: this.duration }, "-=0.4").to('.backImage', { opacity: 0, scale: 1, stagger: this.duration }, '=-1')
      if (this.sequence > 0) {
        setTimeout(() => {
          this.sequence -= 1
          this.animationA()
          this.runAnim()
        }, this.duration * 1000)
      } else {
        this.sequence = Object.keys(this.elements).length
        this.runAnim()
      }
      console.log(this.sequence)
    }
  },
  computed: {
    timeFraction() {
      const rawTimeFraction = this.countDown / this.duration;
      return rawTimeFraction * 100
    }
  },
  watch: {

  },
  mounted() {
    // console.log(Object.keys(this.elements).length)
    gsap.set('.content', { opacity: 0, x: -100 })
    gsap.set('.backImage', { opacity: 0, scale: 1.1 })
    this.runAnim()
    this.timer()
  }
})
