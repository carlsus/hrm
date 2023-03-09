create view vw_deduction AS
select sum(`deductions`.`amount`) AS `deduction` from `deductions`
