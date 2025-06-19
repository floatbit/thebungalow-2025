Instructions for Manually Creating a New ACF Block

Goal: Create the necessary files and update configuration to register a new custom ACF block within the WordPress theme, following the established pattern.

Input: The user will provide the name of the new block (e.g., "My New Block").

Procedure:

1. Determine Block Slug:
   - Convert the provided block name into a URL-friendly slug (e.g., "My New Block" -> my-new-block). This will be used in file paths and identifiers.

2. Create Block Directory:
   - Copy the existing template directory blocks/template to a new directory named after the slug: blocks/[slug].
   - Use a terminal command for this: cp -r blocks/template blocks/[slug] (replace [slug] with the actual slug).

3. Update block.json:
   - Target File: blocks/[slug]/block.json
   - Action: Edit the file to replace placeholders with the new block's details:
     - name: Replace "acf/<id>" with "acf/[slug]"
     - title: Replace "<name>" with the user-provided block name (e.g., "My New Block")
     - keywords: Replace ["<id>"] with ["[slug]"]
     - viewScript (or _viewScript): Replace ["blocks/<id>"] with ["blocks/[slug]"] (ensure this key exists if needed, often it's commented out _viewScript initially).
     - Ensure "mode": "preview" and "renderTemplate": "block.php" are set within the "acf" object.

4. Update block.php:
   - Target File: blocks/[slug]/block.php
   - Action: Edit the file to replace placeholders:
     - Update the PHPDoc comment block title (e.g., * [Block Name] Block Template.).
     - $id: Update the prefix from 'template-' to '[slug]-'.
     - $classes: Update the block-specific class from block-template to block-[slug].
     - Update any placeholder content within the HTML (e.g., the default heading "TODO: blocks/template") to reflect the new block, perhaps with a similar TODO like "TODO: blocks/[slug]".

5. Create SCSS File:
   - Target File: src/scss/blocks/_[slug].scss (note the leading underscore)
   - Action: Create this new file. Add a basic, empty CSS selector for the block's class.
   - Content:
     .block-[slug] {
         // Styles for this block will go here
     }

6. Import SCSS File:
   - Target File: src/scss/blocks/_index.scss
   - Action: Add a new @import statement at the end of the file to include the SCSS file created in the previous step.
   - Content to Add: @import '[slug]';

7. Register Block in PHP:
   - Target File: includes/blocks.php
   - Action: Locate the CUSTOM_BLOCKS constant definition (a nested array defining allowed blocks per post type). Add the new block's slug ('[slug]') to the appropriate inner array(s) (e.g., within 'page', 'post', 'font', etc., based on where the block should be available). Ensure it's added within the square brackets [] for the relevant post type(s).

8. Confirmation: Inform the user that the block structure has been created and the block is registered. It should now be available in the WordPress block editor for the specified post types.
