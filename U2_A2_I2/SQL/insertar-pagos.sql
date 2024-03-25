--
-- script sql auxiliar para agregar pagos
-- Cesar A. V. UnADM ES21204253
--
INSERT INTO Pagos(
    FolioPago,
    IDUsuario,
    Concepto,
    Monto,
    MesPagado,
    FechaPago
) 
VALUES
('CP950ENE', '9999', 'Colegiatura primaria', 6500, 1, STR_TO_DATE('2024-01-07', '%Y-%m-%d')),
('AE950ENE', '9999', 'Actividad extraescolar', 580, 1, STR_TO_DATE('2024-01-05', '%Y-%m-%d')),
('DE950ENE', '9999', 'Desayuno', 1000, 1, STR_TO_DATE('2024-01-09', '%Y-%m-%d')),
('VM905ENE', '9999', 'Visita museo de cera', 980, 2, STR_TO_DATE('2024-01-11', '%Y-%m-%d')),
('VA905MAR', '9999', 'Visita acuario', 1200, 3, STR_TO_DATE('2024-01-12', '%Y-%m-%d')),
('CA905ABR', '9999', 'Campamento', 2750, 4, STR_TO_DATE('2024-01-15', '%Y-%m-%d'))


-- --
-- -- script sql auxiliar para agregar pagos
-- -- Cesar A. V. UnADM ES21204253
-- --
-- create procedure if not exists insertarPago (
--     in folioPago VARCHAR(10),
--     in idUsuario CHAR(4),
--     in concepto VARCHAR(64),
--     in monto DECIMAL(9,2),
--     in mesPagado int,
--     in fechaPago varchar(10)) -- yyyy-mm-dd
-- Begin
-- -- if NOT exists (SELECT FolioPago FROM Pagos WHERE FolioPago = folioPago) then
-- 	INSERT INTO Pagos(
--         FolioPago,
--         IDUsuario,
--         Concepto,
--         Monto,
--         MesPagado,
--         FechaPago) 
--     Select folioPago,
--         idUsuario,
--         concepto,
--         monto,
--         mesPagado,
--         STR_TO_DATE(fechaPago, '')
--     where not exists (Select 1 from Pagos where Pagos.FolioPago = FolioPago)
-- -- END if;
-- end;
-- 
-- DELIMITER ;