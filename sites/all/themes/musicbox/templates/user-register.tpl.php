<?php print drupal_render($form['form_id']); ?>
<?php print drupal_render($form['form_build_id']); ?>

<?php 


print render ($form['mail']);
print render ($form['pass']);
print render ($form['timezone']);
print render ($form['form_token']);
print drupal_render($form['name']);
print drupal_render($form['actions']); 
print drupal_render_children($form);
?>

<input type="submit" name="op" id="edit-submit" value="Create"  class="form-submit" />