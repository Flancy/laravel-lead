import Vue from 'vue';
import VueResource from 'vue-resource';

Vue.use(VueResource);

var vm = new Vue({

  el: '#app',

  http: {

    headers: {
      'X-CSRF-TOKEN': document.querySelector('#token').getAttribute('value')
    }

  },

  data: {

    leads: {
    	'all': true,
      'buy': true,
    },
    debit: {
      money: 1,
      userDebit: ''
    },
    success: {
      status: false,
      message: ''
    }

  },

  methods: {

  	filterLeads: function (val) {

  		if (val == 'buy') {
  			this.leads.all = false;
  		} else {
  			this.leads.all = true;
  		}

  	},

    getUserMoney: function () {

      var self = this;

      this.$http.get('/debit/get-money').then((response) => {
        self.$set('debit.userDebit', response.json().debit);
      }, (response) => {
        console.log(response);
      });

    },

    addMoney: function () {

      var money = this.debit.money;
      var self = this;

      this.debit.money = '';

      this.$http.patch('/debit/add-money', {'money': money}).then((response) => {
        self.$set('success.message', response.json().success);
        self.$set('success.status', true);
        self.getUserMoney();

        setTimeout(function () {
          self.$set('success.status', false);
        }, 5000);
      }, (response) => {
        self.$set('success.message', response.json().success);
      });
    }

  },

  computed: {

    validation: function () {

      return {
        money: !!this.debit.money
      }

    }

  },

  ready: function () {

    this.getUserMoney();

  }

});

Vue.transition('expand', {

  css: false,

  enter: function (el, done) {

    $(el)
      .css({
        'height': 0
      })
      .animate({ height: "200px" }, 200, done);

  },

  enterCancelled: function (el) {

    $(el).stop();

  },

  leave: function (el, done) {

    $(el).animate({ height: "0px" }, 200, done);

  },

  leaveCancelled: function (el) {

    $(el).stop();

  }

});