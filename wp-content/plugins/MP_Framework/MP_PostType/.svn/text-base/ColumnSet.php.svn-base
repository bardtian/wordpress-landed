<?php
/**
 * gere l'affichage des colonnes personnalis�es d'un type personalis�.
 */
class ColumnSet {

  private $columns_params;
  private $postType;

  /** constructeur **/
  function __construct($postType, array $columns_params) {
    $this->postType = $postType;
    $this->columns_params = $columns_params;
    add_filter("manage_{$this->postType}_posts_columns", array($this, "registertypeColumns"));
    add_action("manage_{$this->postType}_posts_custom_column", array($this, "renderCustomColumns"));
  }

  /** callback filtre , mélange les colonnes par défaut et les colonnes perso **/
  public function registertypeColumns($columns) {
    foreach ($this->columns_params as $column) {
      $columns = array_merge($columns, array("$column[id]" => $column['title']));
    }
    return $columns;
  }

  /* callback : pour chaque colonne perso définie
   * si une colonne id correspond à $col , 
   * afficher la valeur de la colonne selon le type
   */

  public function renderCustomColumns($col) {
    global $post;
    foreach ($this->columns_params as $column) {
      if ($column['id'] == $col) {
        switch ($column['type']) {
        case'thumbnail' OR 'post_thumbnail':
          the_post_thumbnail(array('50,50'));
          break;
        case'image':
          echo "<img  src='{$this->value}' alt='{$this->id}'/>";
          break;
        default:
          echo get_post_meta($post->ID, $col, true);
          break;
        }
      }
    }
  }
}

