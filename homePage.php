<style>
<?php include 'homePage.css'; ?>
</style>
<html>
  <header>
    <h1>Home Page</h1>
  </header>
  <div class="form" align="center">
      <form action="complete.php">
        <button type="submit" style="margin:5px">
          Complete Labor Data</button>
      </form>
      <form action="laborDataMonthly.php">
        <button type="submit" style="margin:5px">
          Labor Data Monthly</button>
      </form>
      <form action="laborDataYearly.php">
        <button type="submit" style="margin:5px">
          Labor Data Yearly</button>
      </form>
  </div>

  <div class="form" align="center">
  <form action="um.php">
    <button type="submit" style="margin:5px">
      Unemployment Monthly</button>
  </form>
  <form action="uy.php">
    <button type="submit" style="margin:5px">
      Unemployment Yearly</button>
  </form>
  <form action="em.php">
    <button type="submit" style="margin:5px">
      Employment Monthly</button>
  </form>
  <form action="ey.php">
    <button type="submit" style="margin:5px">
      Employment Yearly</button>
  </form>
</div>

  <div class="form" align="center">
    <form action="laborDataYearly.php">
      <button type="submit" style="margin:5px">
        Covid Cases</button>
    </form>
    <form action="cm.php">
      <button type="submit" style="margin:5px">
        Covid Monthly</button>
    </form>
    <form action="cmy.php">
      <button type="submit" style="margin:5px">
        Covid Cases VS Month and Year</button>
    </form>
  </div>

  <div class="form" align="center">
    Complex Queries<br>
    <form action="unemploymentDueCovid.php">
      <button type="submit" style="margin:5px">Unemployment Due to Covid</button>
    </form>
    <form action="unemploymentVScrime.php">
      <button type="submit" style="margin:5px">Unemployment VS Crime</button>
    </form>
    <form action="covidAtHome.php">
      <button type="submit" style="margin:5px">Covid Cases At Home</button>
    </form>
    <form action="covidSurviveDeath.php">
      <button type="submit" style="margin:5px">Survive VS Death Cases</button>
    </form>
  </div>
  
  <div class="form" align="center">
    <form action="covidAge.php">
      <button type="submit" style="margin:5px">
        Covid Filter By Age</button>
    </form>
  </div>
</html>
