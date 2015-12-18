SELECT
  `m`.`mem_id` 	 AS ID,
  `m`.`en_name`  AS MemberName,
  `Oct`.`bill` 	 AS OctBill,
  `Oct`.`status` AS OctStatus,
  `Nov`.`bill` 	 AS NovBill,
  `Nov`.`status` AS NovStatus,
  `D`.`bill` 	 AS DecBill,
  `D`.`status`   AS DecStatus
FROM
  member_invoice AS `Oct`
LEFT JOIN
  member_invoice AS `Nov` USING(mem_id)
LEFT JOIN
  member_invoice AS `D` USING(mem_id)
LEFT JOIN
  member_list AS m USING(mem_id)
WHERE 
 (`Oct`.`status` = 'Due' ANd `Oct`.`bill_month` = '2015-10-01') OR 
 (`Nov`.`status` ANd `Nov`.`bill_month` = '2015-11-01' = 'Due') OR 
 (`D`.`status` = 'Due' ANd `D`.`bill_month` = '2015-12-01')
