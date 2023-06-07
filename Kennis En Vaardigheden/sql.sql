SELECT location_id, COUNT(DISTINCT department_id) AS number_of_departments
FROM departments
GROUP BY location_id;
