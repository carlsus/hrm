
create view vw_payslip AS
SELECT
concat( `b`.`first_name`, ' ', `b`.`last_name` ) AS `employee_name`,
a.date_created,
a.employee_id,
c.deduction,
-- COALESCE(
-- TIMESTAMPDIFF(MINUTE, in_am, out_am)/60.0 -
--
--     16*(
--         TIMESTAMPDIFF(DAY,    date_created,out_am)-
--         TIMESTAMPDIFF(DAY,   date_created,in_am)
--     ) -
--
--     16*(
--         TIMESTAMPDIFF(WEEK,   date_created,out_am)-
--         TIMESTAMPDIFF(WEEK,   date_created,in_am)
--     ),0) AS morning,
-- 		COALESCE(
-- 		TIMESTAMPDIFF(MINUTE, in_pm, out_pm)/60.0 -
--
--     16*(
--         TIMESTAMPDIFF(DAY,    date_created,out_pm)-
--         TIMESTAMPDIFF(DAY,   date_created,in_pm)
--     ) -
--
--     16*(
--         TIMESTAMPDIFF(WEEK,   date_created,out_pm)-
--         TIMESTAMPDIFF(WEEK,   date_created,in_pm)
--     ),0) AS afternoon,
COALESCE(
TIMESTAMPDIFF(MINUTE, in_am, out_am)/60.0 -

    16*(
        TIMESTAMPDIFF(DAY,    a.date_created,out_am)-
        TIMESTAMPDIFF(DAY,   a.date_created,in_am)
    ) -

    16*(
        TIMESTAMPDIFF(WEEK,   a.date_created,out_am)-
        TIMESTAMPDIFF(WEEK,   a.date_created,in_am)
    ),0) +
		COALESCE(
		TIMESTAMPDIFF(MINUTE, in_pm, out_pm)/60.0 -

    16*(
        TIMESTAMPDIFF(DAY,    a.date_created,out_pm)-
        TIMESTAMPDIFF(DAY,   a.date_created,in_pm)
    ) -

    16*(
        TIMESTAMPDIFF(WEEK,   a.date_created,out_pm)-
        TIMESTAMPDIFF(WEEK,   a.date_created,in_pm)
    ),0) AS total,
(
	CASE

			WHEN ( `b`.`employment_status` = 'Probationary' ) THEN
			`d`.`probationary`/8 ELSE ( `d`.`regular` / 8 )
		END
		) AS `per_hour`

FROM time_attendances a
inner join employees b on b.id=a.employee_id
inner join positions d on d.id=b.position_id

cross join vw_deduction c
where a.payslip_id is null
