## Description 
Allows you to build components on the client side of the blocks together with the usual Drupal blocks settings

## Usage

go to: **admin/config/elementree/settings**  and enter your path of **path/[client-components].js** file.

## How It Works

### Drupal - php

```php
$item = elementree_item( $component_name, $configs);

// $item
// [
//	'#markup' => elementree_markup($component_name, $configs),
//	'#allowed_tags' => ['div', 'script'],
//	'#attached' => [
//		'library' => [
//			'elementree/base',
//			'elementree/components',
//		],
//	],
//];
```

### Client side - [client-components].js
Add the list of components in the "CRWidgets" object.
 - add a component use by a name : `CRWidgets[components_name]`
 - insert a function: `(el, settings) => { ... }`
 - apply the component within the function.
 - @param: `el` is the node element.
 - @param: `settings` is the settings of drupal panels-pane settings.
 
	    if (!window.CRWidgets) {
	        window.CRWidgets = {};
	    }
	    
	    CRWidgets[components_name_1] = (el, settings) => {
	    	// ...
	    }
	    
	    CRWidgets[components_name_2] = (el, settings) => {
	    	// ...
	    }

