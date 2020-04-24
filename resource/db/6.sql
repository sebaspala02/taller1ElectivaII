select DAYNAME(v.fecha_venta) as dia,count(*) as cantidad,sum(v.valor_total) as ingresos from venta v
 group by dia;