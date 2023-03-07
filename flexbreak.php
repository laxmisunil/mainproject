 * the flex item that comes after it break to a new row */

<style>
 .break {
  flex-basis: 100%;
  height: 0;
}
</style>
<div class="container">
  <div class="item">A</div>
  <div class="break">B</div><!-- break -->
  <div class="item">C</div>
</div>