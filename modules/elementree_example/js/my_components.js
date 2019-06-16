
/*
 * Using basic:
 * -----------
 */

if (!window.CRWidgets) {
    window.CRWidgets = {};
}

CRWidgets['MyPageComponentName'] = (el, settings) => {
    el.innerHTML = 'Hello MyPageComponentName !!';
}

CRWidgets['components_name_2'] = (el, settings) => {
    // ...
}


/*
 * Using React:
 * -----------
 *
 *   import React from "react";
 *   import ReactDOM from "react-dom";
 *
 *   import MyComponents from 'components/MyComponents';
 *
 *   CRWidgets['MyComponents'] = function(el, settings) {
 *       ReactDOM.render(React.createElement(MyComponents, settings), el);
 *   }
 *
 */


/*
 * Using Vue:
 * -----------
 *
 *   import Vue from "vue";
 *
 *   CRWidgets['MyComponents'] = function(el, settings) {
 *      new Vue({
 *          el,
 *          data: settings,
 *          template: '<li>This is a template</li>'
 *          methods: {
 *           
 *          },
 *      });
 *   }
 *
 */


