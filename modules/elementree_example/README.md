## Description 
Allows you to build components on the client side of the blocks together with the usual Drupal blocks settings

## Usage

go to: **admin/config/content/client_render**  and enter your path of **path/[client-components-name].js** file.

## How It Works

### Drupal - php

Add panels pane markup:

     <div class='panel-pane pane-{$name}' client-render='{$pane->type}' uuid='{$pane->uuid}'></div>

Add pane settings:
     
      drupal_add_js(array(
        'CRComponentsSettings' => array( $uuid => $settings ),
      ), 'setting');

 
### Drupal - js

    const el = document.querySelector('[client-render]');
	const uuid = el.getAttribute('uuid');
    const name = el.getAttribute('client-render');
    const settings = Drupal.settings.CRComponentsSettings[uuid];
    
    // "CRComponents" - List of available components, that gets from [client-components].js
    CRComponents[name] && CRComponents[name](el, settings);

### Client side - [client-components].js
Add the list of components in the "CRComponents" object.
 - add a component use by a name : `CRComponents[components_name]`
 - insert a function: `(el, settings) => { ... }`
 - apply the component within the function.
 - @param: `el` is the node element.
 - @param: `settings` is the settings of drupal panels-pane settings.
 
	    if (!window.CRComponents) {
	        window.CRComponents = {};
	    }
	    
	    CRComponents[components_name_1] = (el, settings) => {
	    	// ...
	    }
	    
	    CRComponents[components_name_2] = (el, settings) => {
	    	// ...
	    }

