#!/bin/bash

# Get the current working directory
current_directory="$(pwd)"

# Get the directory containing the script
script_directory="$(dirname "$0")"

# Change to the script directory
cd "$script_directory" || exit

# Define the common string for the theme name
common_string="put here theme name"

# Define the strings to replace
search_strings=(
  "tesla_acf_init_home_hero"
  "tesla-theme-blocks"
  "@package tesla-master"
  "tesla_master_comment_count"
  "tesla-master"
  "localhost\/tesla"
  "tesla_acf_init_home_hero"
  "tesla-theme-blocks"
  "'tesla'"
  "tesla_enable_theme_support"
  "tesla_register_custom_nav_menus"
  "tesla_scripts"
  "tesla_register_required_plugins"
  "tesla_register_custom_nav_menus"
  "tesla-block-home-hero"
  "Tesla Theme Blocks"
  "tesla-block"
  "tesla-block-NameOfBlock"
)
replace_strings=(
  "${common_string}_acf_init_home_hero"
  "${common_string}-theme-blocks"
  "@package ${common_string}-master"
  "${common_string}_master_comment_count"
  "${common_string}-master"
  "localhost\/${common_string}"
  "${common_string}_acf_init_home_hero"
  "${common_string}-theme-blocks"
  "'${common_string}'"
  "${common_string}_enable_theme_support"
  "${common_string}_register_custom_nav_menus"
  "${common_string}_scripts"
  "${common_string}_register_required_plugins"
  "${common_string}_register_custom_nav_menus"
  "${common_string}-block-home-hero"
  "${common_string} Theme Blocks"
  "${common_string}-block"
  "${common_string}-block-NameOfBlock"
)

# Recursive search and string replacement
for ((i=0; i<${#search_strings[@]}; i++)); do
    grep -rl "${search_strings[i]}" . | grep -v "replace.sh" | xargs sed -i '' "s/${search_strings[i]}/${replace_strings[i]}/g"
done

# Change back to the original directory
cd "$current_directory" || exit

echo "String replacement completed."

# Delete the tesla-run-rename.sh script
rm "$0"
