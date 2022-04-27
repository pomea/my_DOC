
SELECT location, 
trim(
replace(
replace(
substring_index(
replace(replace(replace(replace(replace(location,'**',''),'model',''),'area',''),'line',''),'station',''),'=',3),
substring_index(
replace(replace(replace(replace(replace(location,'**',''),'model',''),'area',''),'line',''),'station',''),'=',2)
,''),'=',''))
as t FROM pc_inventory.pc_regiter where location like '%**model%';