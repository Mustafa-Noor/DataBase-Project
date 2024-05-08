
-- TASK 1

SELECT C.CustomerID, O.OrderID, O.OrderDate
FROM Customers C
LEFT JOIN ( SELECT CustomerID, OrderID, OrderDate 
			FROM Orders ) O 
ON C.CustomerID = O.CustomerID
ORDER BY C.CustomerID, O.OrderDate

-- TASK 2

SELECT C.CustomerID, O.OrderID, O.OrderDate
FROM Customers C
LEFT JOIN ( SELECT CustomerID, OrderID, OrderDate 
			FROM Orders ) O 
ON C.CustomerID = O.CustomerID
WHERE O.OrderID IS NULL
ORDER BY C.CustomerID, O.OrderDate

-- TASK 3

SELECT C.CustomerID, O.OrderID, O.OrderDate
FROM Customers C
LEFT JOIN ( SELECT CustomerID, OrderID, OrderDate 
			FROM Orders ) O 
ON C.CustomerID = O.CustomerID
WHERE O.OrderDate BETWEEN '1997-07-01' AND '1997-07-31'
ORDER BY C.CustomerID, O.OrderDate

-- TASK 4

SELECT C.CustomerID, (SELECT COUNT(*) FROM Orders O WHERE O.CustomerID = C.CustomerID) AS TotalOrders
FROM Customers C
ORDER BY C.CustomerID

-- TASK 5

SELECT E.EmployeeID, E.FirstName, E.LastName
FROM Employees E
CROSS JOIN (SELECT 1 AS num UNION ALL
			SELECT 2 UNION ALL
			SELECT 3 UNION ALL
			SELECT 4 UNION ALL
			SELECT 5 ) AS numbers
ORDER BY E.EmployeeID

-- TASK 6

SELECT ProductID, ProductName, UnitPrice
FROM Products
WHERE UnitPrice > (SELECT AVG(UnitPrice) FROM Products)
ORDER BY UnitPrice DESC

-- TASK 7

SELECT MAX(UnitPrice) AS SecondHighestPrice
FROM Products
WHERE UnitPrice < (SELECT MAX(UnitPrice) FROM Products)

-- TASK 8

SELECT EmployeeID, Date
FROM ( SELECT EmployeeID
	   FROM Employees ) AS E, 
	 ( SELECT DATEADD(DAY, n.number, '1996-07-04') AS Date
	   FROM master..spt_values n
	   WHERE n.type = 'P'
       AND n.number BETWEEN 0 AND DATEDIFF(DAY, '1996-07-04', '1997-08-04')) AS D

-- TASK 9

SELECT C.CustomerID,(SELECT COUNT(*) FROM Orders O WHERE O.CustomerID = C.CustomerID) AS TotalOrders,
	(	SELECT SUM(OD.Quantity) FROM Orders O JOIN [Order Details] OD ON O.OrderID = OD.OrderID WHERE O.CustomerID = C.CustomerID) AS TotalQuantity
FROM Customers C
WHERE C.Country = 'USA'

-- TASK 10

SELECT C.CustomerID, C.CompanyName, O.OrderID, O.OrderDate
FROM Customers C
LEFT JOIN (SELECT CustomerID, OrderID, OrderDate
           FROM Orders
           WHERE OrderDate = '1997-07-04') AS O 
ON C.CustomerID = O.CustomerID
ORDER BY C.CustomerID

-- TASK 11 (YES)

-- TASK 12

SELECT E.FirstName + ' ' + E.LastName AS EmployeeName, DATEDIFF(YEAR,E.BirthDate,GETDATE()) AS EmployeeAge
FROM Employees E
JOIN (  SELECT EmployeeID, BirthDate, FirstName, LastName
        FROM Employees ) AS M 
ON E.ReportsTo = M.EmployeeID
WHERE E.BirthDate > M.BirthDate

-- TASK 13

SELECT P.ProductName ,( SELECT OrderDate FROM Orders WHERE OrderID = OD.OrderID) AS OrderDate
FROM Products P
JOIN [Order Details] OD ON P.ProductID = OD.ProductID
WHERE OD.OrderID IN (SELECT OrderID FROM Orders WHERE OrderDate = '1997-08-08')

-- TASK 14

SELECT C.Address,C.City,C.Country
FROM Orders O
JOIN Customers C ON O.CustomerID = C.CustomerID
WHERE O.ShipVia = (SELECT EmployeeID FROM Employees WHERE FirstName = 'Anne')
AND O.ShippedDate > O.RequiredDate

-- TASK 15

SELECT DISTINCT C.Country
FROM Orders O
JOIN Customers C ON O.CustomerID = C.CustomerID
JOIN [Order Details] OD ON O.OrderID = OD.OrderID
JOIN Products P ON OD.ProductID = P.ProductID
WHERE P.CategoryID IN ( SELECT CategoryID FROM Categories WHERE CategoryName = 'Beverages')


