function EliminarU(ide){
  if (confirm("¿Realmente deseas eliminar a este usuario?")) {
    window.location.href="../pages/eliminaru.php?ide="+ide;
  }
}

function EliminarNosotros(ide){
  if (confirm("¿Realmente deseas eliminar este Contenido?")) {
    window.location.href="../pages/eliminarnnosotros.php?ide="+ide;
  }
}

function EliminarAviso(ide){
  if (confirm('¿Realmente deseas eliminar este Aviso?')) {
    window.location.href="../pages/eliminaraviso.php?ide="+ide;
  }
}

function EliminarV(ide){
  if (confirm('¿Realmente deseas eliminar este Voluntario?')) {
    window.location.href="../pages/eliminarv.php?ide="+ide;
  }
}

  function EliminarS(ide){
    if (confirm('¿Realmente deseas eliminar este Slider?')) {
      window.location.href="../pages/eliminars.php?ide="+ide;
    }
  }

  function EliminarServ(ide){
    if (confirm('¿Realmente deseas eliminar este Servicio?')) {
      window.location.href="../pages/eliminarserv.php?ide="+ide;
    }
  }

  function EliminarVT(ide){
    if (confirm('¿Realmente deseas eliminar este Video de Trabajo?')) {
      window.location.href="../pages/eliminarvt.php?ide="+ide;
    }
  }

  function EliminarBeneficio(ide){
    if (confirm('¿Realmente deseas eliminar este Beneficio?')) {
      window.location.href="../pages/eliminarbeneficio.php?ide="+ide;
    }
  }

  function EliminarEquipo(ide){
    if (confirm('¿Realmente deseas eliminar a esta persona del Equipo de Trabajo?')) {
        window.location.href="../pages/eliminarequipo.php?ide="+ide;
    }
  }
