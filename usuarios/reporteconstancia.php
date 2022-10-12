<?php ob_start(); ?>
<h2>

  <p style="text-align: center;">CONSTANCIA DE CUMPLIMIENTO DE ACTIVIDAD COMPLEMENTARIA.
  </p>
</h2>
<br>


C.
<br>

Jefe(a) del Departamento de Servicios Escolares o su equivalente en los Institutos Tecnológicos Descentralizados

<br>
PRESENTE.
<br>
<br>
<br>
<p style="text-align: justify;">
  El que se suscribe, por
  este medio se permite hacer de su conocimiento que el estudiante
  con numero de control
  de la carrera de
  ha cumplido su actividad complementaria con el nivel de desempeño
  y un valor numérico de
  durante el periodo escolar
  con un valor curricular de
  créditos.
</p>
<br>
<br>
<br>
<p style="text-align: right;">
  Se extiende la presente en la
  a los
  días de
  de
</p>
<br>
<br>
<br>
<br>
<p style="text-align: center;">
  ATENTAMENTE
</p>


</div>

</body>

</html>
<?php
$html = ob_get_clean();
require_once './libreria/dompdf/autoload.inc.php';

use Dompdf\Dompdf;

$dompdf = new Dompdf;

$options = $dompdf->getOptions();
$options->set(array('isRemoteEnabled' => true));

$dompdf->setOptions($options);

$dompdf->loadHtml($html);
$dompdf->setPaper('letter');

$dompdf->render();
$dompdf->stream("archivo_.pdf", array("Attachment" => false));
?>