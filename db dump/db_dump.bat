@echo off
REM MySQL database dump script

REM Set your database connection details
SET DB_HOST=localhost
SET DB_USER=drusha01
SET DB_PASS=Uwat09hanz@2
SET DB_NAME=parkit
SET DIR_PATH=%CD%\Backup\
SET FOLDER_PATH=%DIR_PATH%%DB_NAME%\

SET /A counter=0
SET /A MAX_FILES=7

FOR /F "delims=" %%A IN ('C:\wamp64\bin\mysql\mysql8.0.31\bin\mysql.exe -h %DB_HOST% -u %DB_USER% -p %DB_PASS% -D %DB_NAME% -N -e "SELECT CURDATE();"') DO SET MYSQL_DATE=%%A
SET FORMATTED_DATE=%MYSQL_DATE:-=_% 

REM Perform the dump using mysqldump



SET FILE_PATH=%CD%\input.txt

REM Loop through each line in the file
FOR /F "delims=" %%A IN (%FILE_PATH%) DO (
	SETLOCAL EnableDelayedExpansion
    	SET DB_NAME=%%A
	SET FOLDER_PATH=%DIR_PATH%!DB_NAME!\

	IF NOT EXIST !DIR_PATH! (
    		mkdir !DIR_PATH!
	)

	IF NOT EXIST !FOLDER_PATH! (
    		mkdir !FOLDER_PATH!
	)
	SET OUTPUT_FILE=!FOLDER_PATH!!DB_NAME!_%FORMATTED_DATE%
	echo creating back up for !DB_NAME! . . .
	
	"C:\wamp64\bin\mysql\mysql8.0.31\bin\mysqldump.exe" -h %DB_HOST% -u %DB_USER% -p%DB_PASS% !DB_NAME! > "!OUTPUT_FILE!.sql"
	
	pause
	REM Loop through files and increment the counter
	for /f "delims=" %%F in ('dir "!FOLDER_PATH!\*.*" /T:C /O:-D /B') do (
    		SET /A counter+=1
		IF !counter! GEQ %MAX_FILES% (
			DEL "!FOLDER_PATH!%%F"
    		) 
	)
	REM End delayed expansion
	ENDLOCAL
)



