'use strict';

export default {
    mounted() {
        console.log('mixins')
    },
    methods: {
        enlargeImg :function(img) {
            console.log("clicked")
            img.style.transform = "scale(1.5)";
            img.style.transition =
              "transform 0.25s ease";
        }
    }
}