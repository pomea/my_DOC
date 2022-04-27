
update pc_inventory.pc_regiter 
set 
station = trim(
replace(
replace(
substring_index(
replace(replace(replace(replace(replace(location,'**',''),'model',''),'area',''),'line',''),'station',''),'=',5),
substring_index(
replace(replace(replace(replace(replace(location,'**',''),'model',''),'area',''),'line',''),'station',''),'=',4)
,''),'=',''))
where location like '%*%';

SELECT * FROM pc_inventory.pc_regiter;