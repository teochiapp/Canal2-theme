<form class="form-search" 
      action="<?php echo esc_url( site_url( '/' ) ); ?>" 
      method="get" 
      accept-charset="utf-8">
    <input type="text" 
    name="s"
    onblur="if (this.value == '') {this.value = '<?php echo get_search_query(); ?>' ;}" 
    onfocus="if(this.value != '') {this.value = '';}" 
    value="Busca en el sitio..."   
    >
    <button 
    class="button" 
    title="Subscribe" 
    type="submit">
        <i class="fa fa-search"></i>
    </button>
</form>