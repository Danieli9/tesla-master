# Tesla Theme

![Tesla Theme Banner](https://tesladesignstudio.com/tesla-cover.png)

Tesla Theme is a foundational theme specifically crafted to expedite the process of custom theme-building, while maintaining exceptional code efficiency and site performance. Leveraging Twitter's Bootstrap 5 framework, this theme serves as a robust frontend framework.

Tesla Theme is tailored for developing fully-customized solutions, prioritizing flexibility over turn-key functionality. Particularly on the frontend, it offers a clean canvas for efficient and seamless customization. The theme excels in projects that heavily rely on custom post meta and theme options, whether through theme modifications or custom configurations, thanks to its optimized design that minimizes the number of necessary database queries. Originally, Tesla Theme was created to streamline the conversion of preapproved design comps into fully functional themes.

# Tesla Run Rename

The `tesla-run-rename.sh` script is a tool that helps you quickly and easily perform string replacements in theme. This can be useful when you start a project.

## Usage

1. Download or clone this project to your computer.

2. Open a terminal and navigate to the directory where `tesla-run-rename.sh` script is located.

3. Open the `tesla-run-rename.sh` file in a text editor, such as Visual Studio Code. Inside the file, locate the line `common_string="put here theme name"`. Replace the placeholder `put here theme name` with your theme name. Make sure to use all lowercase letters, without spaces or special characters.

4. Save the changes in the `tesla-run-rename.sh` file.

5. Assign executable permission to the script using the following command in the terminal: `chmod +x tesla-run-rename.sh`

6. Run the script using the following command: `./tesla-run-rename.sh`

8. The script will recursively search your WordPress theme and perform the string replacements based on the configured values.

9. Once the script finishes execution, the `tesla-run-rename.sh` file will be automatically deleted.

