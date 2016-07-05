new Vue({
  el: '#app',
  data: {
  	leads: {
  		'all': true,
    	'buy': true,
  	}
  },
  methods: {
  	filterLeads: function (val) {
  		if (val == 'buy') {
  			this.leads.all = false;
  		} else {
  			this.leads.all = true;
  		}
  	}
  }
});

Vue.transition('fade', {
  css: false,
  enter: function (el, done) {
    $(el)
      .css('opacity', 0)
      .animate({ opacity: 1 }, 1000, done)
  },
  enterCancelled: function (el) {
    $(el).stop()
  },
  leave: function (el, done) {
    $(el).animate({ opacity: 0 }, 1000, done)
  },
  leaveCancelled: function (el) {
    $(el).stop()
  }
});