create view vw_payslip AS
SELECT DISTINCT
	concat( `b`.`first_name`, ' ', `b`.`last_name` ) AS `employee_name`,
	`a`.`date_created` AS `date_created`,
	`a`.`employee_id` AS `employee_id`,(
	CASE

			WHEN ( `a`.`deduction` = '1' ) THEN
			`c`.`deduction` ELSE 0
		END
			) AS `deduction`,(
			COALESCE ((((
							timestampdiff( MINUTE, `a`.`in_am`, `a`.`out_am` ) / 60.0
							) - (
							16 * (
							timestampdiff( DAY, `a`.`date_created`, `a`.`out_am` ) - timestampdiff( DAY, `a`.`date_created`, `a`.`in_am` )))) - (
						16 * (
						timestampdiff( WEEK, `a`.`date_created`, `a`.`out_am` ) - timestampdiff( WEEK, `a`.`date_created`, `a`.`in_am` )))),
				0
				) + COALESCE ((((
							timestampdiff( MINUTE, `a`.`in_pm`, `a`.`out_pm` ) / 60.0
							) - (
							16 * (
							timestampdiff( DAY, `a`.`date_created`, `a`.`out_pm` ) - timestampdiff( DAY, `a`.`date_created`, `a`.`in_pm` )))) - (
						16 * (
						timestampdiff( WEEK, `a`.`date_created`, `a`.`out_pm` ) - timestampdiff( WEEK, `a`.`date_created`, `a`.`in_pm` )))),
				0
			)) AS `total`,(
		CASE

				WHEN ( `b`.`employment_status` = 'Probationary' ) THEN
				`d`.`probationary`/8 ELSE ( `d`.`regular` / 8 )
			END
			) AS `per_hour`
		FROM
			(((
						`time_attendances` `a`
						JOIN `employees` `b` ON ((
								`b`.`id` = `a`.`employee_id`
							)))
					JOIN `positions` `d` ON ((
							`d`.`id` = `b`.`position_id`
						)))
	JOIN `vw_deduction` `c`)
