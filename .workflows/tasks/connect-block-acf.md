Instructions for Connecting an ACF Block to its Fields

Goal: Modify a WordPress block's PHP template file (block.php) to dynamically display content retrieved from its associated Advanced Custom Fields (ACF) field group, replacing any hardcoded placeholder content while preserving the existing HTML structure.

Input: The user will provide the name of the block (e.g., "Hero Slideshow", "Purchase CTA").

Procedure:

1. Identify Block Slug and Template Path:
   - Infer the block's slug from the provided name (e.g., "Hero Slideshow" -> hero-slideshow).
   - The block's template file is typically located at: blocks/[slug]/block.php.

2. Locate the ACF Field Group JSON Definition:
   - ACF field group definitions are stored as .json files, usually within an acf-json/ directory in the theme root.
   - Search Strategy:
     - Attempt to find a JSON file matching the block name or slug (this might not always work as filenames can be keys like group_xxxx.json).
     - If not found by name, search the content of .json files within the acf-json/ directory for:
       - The "title" property matching the provided block name (e.g., "title": "Block: Hero Slideshow").
       - OR the "location" array containing the block's value (e.g., "value": "acf/[slug]").
     - Special Case (Options Page): If the user specifies the fields are on an Options Page, search for the JSON file where the "location" array contains "param": "options_page" and the appropriate "value" (e.g., "value": "specimen-information").

3. Parse ACF Field Definitions:
   - Read the identified ACF JSON file.
   - Extract the defined fields, noting their name (e.g., slideshow_images, text, people) and type (e.g., gallery, wysiwyg, repeater, image, text, file, link, true_false).
   - For repeater fields, also note the names and types of their sub_fields.

4. Read the Block Template File (block.php):
   - Read the content of the block's PHP template file identified in Step 1.

5. Modify the Block Template File (block.php):
   - Fetch ACF Data: At the beginning of the PHP section (before the HTML), add get_field() calls to retrieve the value for each ACF field identified in Step 3.
     - For standard block fields: $field_variable = get_field('field_name');
     - For fields from an Options Page: $field_variable = get_field('field_name', 'option');
   - Replace Hardcoded Content: Locate the hardcoded content in the HTML structure that corresponds to the ACF fields. Replace it with PHP code to display the fetched ACF data.
   - Handle Field Types Appropriately:
     - Text/Textarea: <?php echo esc_html( $field_variable ); ?> (inside appropriate HTML tag). Add an if ($field_variable) check.
     - WYSIWYG: <?php echo $field_variable; ?> (usually output raw). Add an if ($field_variable) check.
     - Image/File: Access data from the returned array (e.g., $field_variable['url'], $field_variable['alt'], $field_variable['id']). Use esc_url() for URLs and esc_attr() for attributes. Add an if ($field_variable) check.
     - Gallery/Repeater: Use a foreach loop (e.g., foreach ($repeater_variable as $item)). Access subfields within the loop (e.g., $item['sub_field_name']). Add an if ($repeater_variable) check around the loop.
     - Link: Access data from the returned array (e.g., $link_variable['url'], $link_variable['title'], $link_variable['target']). Use esc_url(), esc_html(), esc_attr(). Add checks for URL and Title.
     - True/False: Use directly in PHP if conditions (e.g., if ( $true_false_variable ), if ( ! $true_false_variable )).
   - Preserve HTML Structure: Crucially, reuse the existing HTML tags and CSS classes. Do not add new wrappers or change the layout unless explicitly requested. Insert the dynamic PHP code within the existing structure.
   - Conditional Rendering: Wrap dynamic output in appropriate PHP if conditions (e.g., <?php if ($field_variable): ?> ... <?php endif; ?>) to prevent errors or empty tags if a field is not filled in the editor.

6. Output: Provide the complete, modified content of the block.php file.

7. Note on Linting: Ignore potential linter errors related to undefined WordPress or ACF functions (get_field, esc_html, esc_url, esc_attr, get_permalink, etc.), as these are expected in a WordPress context.
