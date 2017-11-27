# The New Feature Keys 
### Domain Framework

## What's this about? 
This repository defines how Feature Keys work. However, the Feature Keys themselves are not
defined here. Therefore, this repository can be used for any project and any set of Feature Keys. Just
pull the package and define the structure of your Feature Keys in the config files.

## What's a Feature Key?
Feature Key defines access setting and/or value setting related to a specific feature.

## Feature Access, Feature Value, and Feature Override
Feature Keys consist of three main parts:
- *Feature Access* - a setting that defines access to a feature. 
It is represented by a boolean value that always needs to be set. Feature Access can be disabled or enabled. 
Feature Access can have a parent. Parent relates to another Feature Access that needs to be enabled in order to enable given access.
- *Feature Value* - A setting that is represented by a value of a given type. It always has to be set. Supported types are: Integer, Boolean, String, Option, and Percentage.
- *Feature Override* - Feature Access and Feature Value can be overrode. Overrides are defined by parameters.

## Examples of usage?
There's a StarWars Feature Keys app defined purely for testing purposes. Head on there to see how Accesses, Values, and Overrides
are defined. https://github.com/workivate/feature-keys/tree/master/tests/StarWars
