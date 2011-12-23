<?php $_ENV['title'] = 'forms'//putenv('title=forms') ?>
<h1>Forms</h1>

<div class="w24 s">

  <form id="dummy" action="" method="post">

    <fieldset>
      <legend>Simple sample form</legend>
      <p>
        <label for="dummy0">Text input (title)</label><br>
        <input type="text" class="title" name="dummy0" id="dummy0" value="Field with class .title">
      </p>

      <p>
        <label for="dummy1">Another field</label><br>
        <input type="text" class="text" id="dummy1" name="dummy1" value="Field with class .text">
      </p>

      <p>
        <label for="dummy2">Textarea</label><br>
        <textarea name="dummy2" id="dummy2" rows="5" cols="20"></textarea>
      </p>

      <p>
        <label for="dummy3">A password field</label><br>
        <input type="password" class="text" id="dummy3" name="dummy3" value="Password field with class .text">
      </p>

      <p>
        <input type="submit" value="Submit">
        <input type="reset" value="Reset">
      </p>

    </fieldset>
  </form>

</div>
<div class="w24">

  <div class="error">
    This is a &lt;div&gt; with the class <strong>.error</strong>. <a href="#">Link</a>.
  </div>
  <div class="notice">
    This is a &lt;div&gt; with the class <strong>.notice</strong>. <a href="#">Link</a>.
  </div>
  <div class="info">
    This is a &lt;div&gt; with the class <strong>.info</strong>. <a href="#">Link</a>.
  </div>
  <div class="success">
    This is a &lt;div&gt; with the class <strong>.success</strong>. <a href="#">Link</a>.
  </div>

  <fieldset>
    <legend>Select, checkboxes, lists</legend>

    <p>
      <label for="dummy3">Select field</label><br>
      <select id="dummy3" name="dummy3">
        <option value="1">Ottawa</option>
        <option value="2">Calgary</option>
        <option value="3">Moosejaw</option>
      </select>
    </p>

    <p>
      <label for="dummy4">Select with groups</label><br>
      <select id="dummy4" name="dummy4">
        <option>Favorite pet</option>
        <optgroup label="mammals">
          <option>dog</option>
          <option>cat</option>
          <option>rabbit</option>
          <option>horse</option>
        </optgroup>
        <optgroup label="reptiles">
          <option>iguana</option>
          <option>snake</option>
        </optgroup>
      </select>
    </p>

    <p><label>Radio buttons</label><br>
      <input type="radio" name="example"> Radio one<br>
      <input type="radio" name="example"> Radio two<br>
      <input type="radio" name="example"> Radio three<br>
    </p>

    <p><label>Checkboxes</label><br>
      <input type="checkbox"> Check one<br>
      <input type="checkbox"> Check two<br>
      <input type="checkbox"> Check three<br>
    </p>

  </fieldset>

</div>

<div class="w48">

  <fieldset>
    <legend>Alignment</legend>

    <p>
      <label for="dummy5">Select field</label>
      <select id="dummy5" name="dummy5">
        <option value="1">Ottawa</option>
        <option value="2">Calgary</option>
        <option value="3">Moosejaw</option>
      </select>
    </p>

    <p>
      <label for="dummy6">Text input (title)</label>
      <input type="text" class="title" name="dummy6" id="dummy6" value="Field with class .title">
    </p>

    <p>
      <label for="dummy7">Select field</label>
      <select id="dummy7" name="dummy7">
        <option value="1">Ottawa</option>
        <option value="2">Calgary</option>
        <option value="3">Moosejaw</option>
      </select>
      <label for="dummy8">Another field</label>
      <input type="text" class="text" id="dummy8" name="dummy8" value="Field with class .text">
    </p>

  </fieldset>

</div>

<div class="w48">
  <form action="" method="post" class="inline">
    <fieldset>
      <legend>A form with class "inline"</legend>
      <div class="w6 s">
        <label for="a">Label A:</label>
        <select id="a" name="a" >
          <option value="0">All</option>
        </select>
      </div>
      <div class="w4 s">
        some text
      </div>
      <div class="w6 s">
        <input type="checkbox" id="o" name="o" value="true" checked="checked" class="checkbox">checkbox one
      </div>
      <div class="w6 s">
        <label for="b">Label B:</label>
        <select id="b" name="b" >
          <option value="0">All</option>
        </select>
      </div>
      <div class="w4 s">
        <a href="#">A Hyperlink</a>
      </div>
      <div class="w16 s">
        <input type="text" class="text" id="q" name="q" value="Field with class .text">
      </div>
      <div class="w4">
        <input type="submit" value="submit" class="button">
      </div>
    </fieldset>

  </form>

</div>
