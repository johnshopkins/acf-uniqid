<?php

class UniqueIDField extends \acf_field
{
  public function __construct()
  {
    $this->name = 'unique_id';
    $this->label = __('Unique ID', "acf-$this->name");
    $this->category = 'basic';

    $this->defaults = [
      'prefix' => '',
      'more_entropy' => false,
    ];

    parent::__construct();
  }

  public function render_field_settings($field)
  {
    acf_render_field_setting(
      $field,
      [
        'label' => __('Prefix', 'acf'),
        'instructions' => __( 'If set, will be used as the `prefix` argument to uniqid()', 'acf'),
        'name' => 'uniqid_prefix',
        'type' => 'text',
      ]
    );

    acf_render_field_setting(
      $field,
      [
        'label' => __('More entropy', 'acf'),
        'instructions' => __('Used as the `more_entropy` argument to uniqid().', 'acf'),
        'name' => 'uniqid_more_entropy',
        'type' => 'true_false',
        'ui' => 1,
      ]
    );
  }

  public function render_field($field)
  {
    ?>
    <input
      type="hidden"
      name="<?php echo esc_attr($field['name']) ?>"
      value="<?php echo esc_attr($field['value']) ?>"
    />
    <?php
  }

  public function update_value($value, $post_id, $field)
  {
    if (!empty($value)) {
      return $value;
    }

    return uniqid($field['uniqid_prefix'], (bool) $field['more_entropy']);
  }

  public function input_admin_enqueue_scripts()
  {
    echo "<style>.acf-field-unique-id { display: none; }</style>";
  }
}
