<style>
<?php include 'homePage.css'; ?>
</style>
<html>
  <header>
    <h1>Home Page</h1>
  </header>
  <div class="form" align="center">
    Raw Data<br>
      <form action="rawLaborData.php">
        <button type="submit" style="margin:5px">
          Raw Labor Data</button>
      </form>
      <form action="rawCovidData.php">
        <button type="submit" style="margin:5px">
          Raw Covid Data</button>
      </form>
      <form action="rawDeathData.php">
        <button type="submit" style="margin:5px">
          Raw Deaths Data</button>
      </form>
      <form action="rawHosData.php">
        <button type="submit" style="margin:5px">
          Raw Covid Hospitalization Data</button>
      </form>
      <form action="rawCrimeData.php">
        <button type="submit" style="margin:5px">
          Raw Crime Data</button>
      </form>
  </div>
  <div class="form" align="center">
    Labor Data<br>
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
    Unemployment & Employment<br>
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
    Covid Data <br>
    <form action="cmy.php">
      <button type="submit" style="margin:5px">
        Covid Cases Monthly</button>
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
    <form action="monthlyArrest.php">
      <button type="submit" style="margin:5px">
        Monthly Arrests In The District With Highest Crime</button>
    </form>
    <form action="apartmentVSstreet.php">
      <button type="submit" style="margin:5px">
        Apartment Arrest VS Street Arrest</button>
    </form>
  </div>

  <div class="form" align="center">
    <form action="totalVSdomestic.php">
      <button type="submit" style="margin:5px">
        Total Arrests VS Domestic Arrests</button>
    </form>
    <form action="top5crime.php">
      <button type="submit" style="margin:5px">
        Top 5 Crimes Each Year</button>
    </form>
    <form action="gun.php">
      <button type="submit" style="margin:5px">
        Gun Related Crime Cases</button>
    </form>
  </div>
  <div class="form" align="center">
    Total Labor Tuples:
    <?php
    $nis = "hesun";
    $password= "092700Jimmy";
    $que = "SELECT COUNT(*) AS \"TOTAL LABOR DATA\" FROM \"G.AGRAWAL\".\"LABOR_DATA\"";
    $conn=oci_connect($nis,$password,
    'oracle.cise.ufl.edu:1521/orcl');
    if(empty($nis) or empty($password)){
        echo "UserID atau Password is empty<br>\n";}

    if(!$conn){
        echo 'connection error';
    }
    $result=oci_parse($conn,$que);
    oci_execute($result);
    while (($row = oci_fetch_array($result, OCI_NUM)) != false) {
        echo $row[0];
    }
    ?>
  </div>

    <div class="form" align="center">
      Total Crime Tuples:
      <?php
      $nis = "hesun";
      $password= "092700Jimmy";
      $que = "SELECT COUNT(*) AS \"TOTAL CRIME DATA\" FROM \"G.AGRAWAL\".\"CRIME\"";
      $conn=oci_connect($nis,$password,
      'oracle.cise.ufl.edu:1521/orcl');
      if(empty($nis) or empty($password)){
          echo "UserID atau Password is empty<br>\n";}

      if(!$conn){
          echo 'connection error';
      }
      $result=oci_parse($conn,$que);
      oci_execute($result);
      while (($row = oci_fetch_array($result, OCI_NUM)) != false) {
          echo $row[0];
      }
      ?>
    </div>
    <div class="form" align="center">
      Total Covid Tuples:
      <?php
      $nis = "hesun";
      $password= "092700Jimmy";
      $que = "SELECT COUNT(*) AS \"TOTAL COVID DATA\" FROM \"G.AGRAWAL\".\"COVID_CASES\"";
      $conn=oci_connect($nis,$password,
      'oracle.cise.ufl.edu:1521/orcl');
      if(empty($nis) or empty($password)){
          echo "UserID atau Password is empty<br>\n";}

      if(!$conn){
          echo 'connection error';
      }
      $result=oci_parse($conn,$que);
      oci_execute($result);
      while (($row = oci_fetch_array($result, OCI_NUM)) != false) {
          echo $row[0];
      }
      ?>
    </div>
</html>
