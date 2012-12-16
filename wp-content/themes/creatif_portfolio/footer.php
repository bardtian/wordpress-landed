<!-- 
************************
* FOOTER
************************
-->
<div id="footer">
  <div class="container">
    <div class="footer_column long">
      <? include(TEMPLATEPATH.DIRECTORY_SEPARATOR.'about.txt')?>
    </div>
    <div class="footer_column">
      <h3>More Links</h3>
      <ul>
<?
wp_list_bookmarks('title_li=&categorize=0');
?>
      </ul>
    </div>
    <div class="footer_column">
      <h3>RSS</h3>
      <ul>
        <li><a href="">RSS Feed</a></li>
        <li><a href="">What is RSS?</a></li>
      </ul>
    </div>
  </div>
</div>
<? wp_footer()?>
</body>
</html>
