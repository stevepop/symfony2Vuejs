import Vue from 'vue';

Vue.component('activity', {
   template: '#activity',

    data: function() {
        return {
            activity: "",
            activities: []
        }
    },
    
    ready: function() {
        this.fetchActivities();
    },

    methods: {
        addActivity: function(activity) {
            var activityItem = {'name': activity};
            this.activities.push(activityItem);
        },

        fetchActivities: function() {
            this.activities = [
                { 'name': 'My first activity'},
                { 'name': 'My second activity'},
                { 'name': 'My third activity'}
            ]
        },

        deleteActivity: function(activity) {
            this.activities.$remove(activity);
        }
    }


});

new Vue({
    el: 'body',

    data: {
        displayform: false,
        displayActivities: false
    },

    methods: {
        showForm: function() {
            this.displayform = true;
        },

        showActivity: function() {
            this.displayActivities = true;
        }
    }

});