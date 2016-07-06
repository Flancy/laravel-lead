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

Vue.transition('expand', {
  css: false,
  enter: function (el, done) {
    $(el)
      .css({
        'height': 0
      })
      .animate({ height: "200px" }, 200, done)
  },
  enterCancelled: function (el) {
    $(el).stop()
  },

  leave: function (el, done) {
    $(el).animate({ height: "0px" }, 200, done)
  },
  leaveCancelled: function (el) {
    $(el).stop()
  }
});