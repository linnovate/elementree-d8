## Description 
Allows you to build components on the client side of the blocks together with the usual Drupal blocks settings

## Usage

Add the list of components in the "CRComponents" object.
 - add a component use by a name : `CRComponents[components_name]`
 - insert a function: `(el, settings) => { ... }`
 - apply the component within the function.
 - @param: `el` is the node element.
 - @param: `settings` is the settings of drupal panels-pane settings.

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