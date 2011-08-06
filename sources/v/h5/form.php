<form action="<?php echo URI_BASE ?>/h5" method="get">

  <fieldset class="w18">
    <legend>Grid generator</legend>
    <div class="w18">
      <label  class="column w6 text" for="nb">Fields number</label>
      <input  class="text w2 s" type="text" id="nb" name="nb" value="48">
    </div>

    <div class="w9 s">
      <label class="column w6 text" for="width">Column width</label>
      <input type="text" class="text w2" id="width" name="width" value="20">
    </div>
    <div class="w9">
      <label class="column w6 text" for="input_padding">Input padding</label>
      <input type="text" class="text w2" id="input_padding" name="input_padding" value="2">
    </div>

    <div class="w9 s">
      <label class="column w6 text" for="gutter">Column gutter</label>
      <input type="text" class="text w2" id="gutter" name="gutter" value="10">
    </div>
    <div class="w9">
      <label class="column w6 text" for="textarea_padding">Textarea padding</label>
      <input type="text" class="text w2" id="textarea_padding" name="textarea_padding" value="6">
    </div>

    <div class="q9 w9 s inline">
      <!--<br>
      <input type="checkbox" id="reset" name="reset" value="true" checked="checked">
      <label for="reset">reset</label>
      <br>
      <input type="checkbox" id="forms" name="forms" value="true" checked="checked">
      <label for="forms">forms</label>
      <br>
      <input type="checkbox" id="typography" name="typography" value="true" checked="checked">
      <label for="typography">typography</label>
      <br>
      <input type="checkbox" id="grid" name="grid" value="true" checked="checked">
      <label for="grid">grid</label>
      <br>
      <input type="checkbox" id="other" name="other" value="true" checked="checked">
      <label for="other">other</label>-->
    </div>

    <div class="q9 w9 inline">
      <input class="w4" type="submit" value="Submit">
      <input class="w4" type="reset" value="Reset">
    </div>

  </fieldset>
</form>
