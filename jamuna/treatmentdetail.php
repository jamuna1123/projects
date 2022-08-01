

<?php include('connect.php');
?>
<div class="page-body">

<div class="card">
<div class="card-header">
    <div class="col-sm-10">
    </div>
<!-- <h5>DOM/Jquery</h5>
<span>Events assigned to the table can be exceptionally useful for user interaction, however you must be aware that DataTables will add and remove rows from the DOM as they are needed (i.e. when paging only the visible elements are actually available in the DOM). As such, this can lead to the odd hiccup when working with events.</span> -->
</div>
<div class="card-block">
<div class="table-responsive dt-responsive">
<table id="dom-jqry" class="table table-striped table-bordered nowrap">
<thead>
<tr>
    <th width="71"  scope="col">Treatment type</th>
    <th width="52"  scope="col">Patient</th>
    <th width="78"  scope="col">Doctor</th>
    <th width="82"  scope="col">Treatment Description</th>
    <th width="43"  scope="col">Treatment date</th>
    <th width="43"  scope="col">Treatment time</th>
</tr>
</thead>
<tbody>
  <?php
    $sql ="SELECT * FROM treatment_records where status='Active'";
    if(isset($_SESSION['patientid']))
    {
      $sql = $sql . " AND patientid='$_SESSION[patientid]'"; 
    }
    if(isset($_SESSION['doctorid']))
    {
      $sql = $sql . " AND doctorid='$_SESSION[doctorid]'";
      

<hr>
	

      
    }
    $qsql = mysqli_query($conn,$sql);
    while($rs = mysqli_fetch_array($qsql))
    {
      $sqlpat = "SELECT * FROM patient WHERE patientid='$rs[patientid]'";
      $qsqlpat = mysqli_query($conn,$sqlpat);
      $rspat = mysqli_fetch_array($qsqlpat);
      
      $sqldoc= "SELECT * FROM doctor WHERE doctorid='$rs[doctorid]'";
      $qsqldoc = mysqli_query($conn,$sqldoc);
      $rsdoc = mysqli_fetch_array($qsqldoc);
      
      $sqltreatment= "SELECT * FROM treatment WHERE treatmentid='$rs[treatmentid]'";
      $qsqltreatment = mysqli_query($conn,$sqltreatment);
      $rstreatment = mysqli_fetch_array($qsqltreatment);
      
        echo "<tr>
          <td>&nbsp;$rstreatment[treatmenttype]</td>
       <td>&nbsp;$rspat[patientname]</td>
        <td>&nbsp;$rsdoc[doctorname]</td>
      <td>&nbsp;$rs[treatment_description]</td>
       <td>&nbsp;$rs[treatment_date]</td>
        <td>&nbsp;$rs[treatment_time]</td>";  
  
       echo " </tr>";
    }
    ?>
</tbody>
