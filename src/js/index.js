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
      duration: 8,
      sequence: 0,
      elements: gsap.utils.toArray(".content"),
      howMany: 0,
      progress: 100,
      completed: false,
      tempo: 50,
    }
  },
  methods: {

    resetTimer() {
      this.countDown = this.duration
    },

    timer(tempo) {
      let setIntervalRef = setInterval( ()=> {
        this.progress--;
        if (this.progress == 0) {
          clearInterval(setIntervalRef);
          this.completed = true;
        }
      }, this.tempo);
    },

    restart() {
      this.completed = false;
      this.progress = 100;
      this.timer(this.tempo);
    },

    animation(i) {
      var content = '.content-' + this.sequence
      var image = '.backImage-' + this.sequence
      gsap.fromTo(content, { x: -100, opacity: 0 }, { x: 0, opacity: 1, duration: 1 })
      gsap.fromTo(image, { scale: 1.2, opacity: 0 }, { scale: 1.1, opacity: 1, duration: 1 })
      gsap.to(content, { x: -100, opacity: 0, duration: 0.5, delay: this.duration })
      gsap.to(image, { scale: 1, opacity: 0, duration: 0.5, delay: this.duration }).then(() => {
        if (this.sequence > 0) {
          this.sequence--
        } else {
          this.sequence = this.howMany
        }
        this.animation()
        this.countDown = 5
        this.restart()

      })
    }
  },

  mounted() {
    this.tempo = this.duration * 10
    this.sequence =  Object.keys(this.elements).length - 1
    this.timer(this.tempo)
    this.howMany = Object.keys(this.elements).length - 1
    this.animation()
  }

})
