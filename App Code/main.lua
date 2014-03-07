---------------------------------------------------------------------------------
--
-- main.lua
-- This mobile app and Home Auto Control simulation 
-- was written by Bill Voisine for Team 4's project.
-- 
-- The following images were used for the purposes of this simulation: 
-- Light Bulb - http://www.thebestledbulbs.co.uk/wp-content/uploads/2013/11/light-bulbs-header.png 
-- Thermometer - http://www.homedepot.com/p/AcuRite-Analog-Thermometer-00346HDSB/100659741?N=5yc1vZc6o0
-- 
---------------------------------------------------------------------------------

display.setStatusBar( display.HiddenStatusBar )
system.setIdleTimer( false )

local screenGroup = display.newGroup()
local ui = require("ui")
local ftp = require("ftp")
local itemFound = false

function main()
	
	local statusBtn
	local profilesBtn
	local settingsBtn
	local helpBtn
	local logoutBtn
	local bulbStat
	local securityStat
	local roomTemp
	local pointer
	local textMessage
	local fileName
	
	local textFileSearch = { "outside.txt", "bed.txt", "living.txt", "kitchen.txt", "bath.txt" }

	-- load background image
	local BG = display.newImage("Background.png")
	BG.x = display.contentCenterX
	BG.y = display.contentCenterY
	screenGroup:insert( BG )

function updateImages(fileName)
	-- load status display images
	
	print ("HELLO: ", fileName)
	
	if (fileName == nil) then
		bulbStat = display.newImage("lightOff.png")
	else 
		bulbStat = display.newImage("lightOn.png")
	end
	bulbStat:scale(.25, .25)
	bulbStat.x = 75
	bulbStat.y = 110
	screenGroup:insert(bulbStat)
	
	if (fileName == nil) then
		securityStat = display.newImage("Red.png")
	else
		securityStat = display.newImage("Green.png")
	end
	securityStat:scale(.35, .35)
	securityStat.x = 260
	securityStat.y = 120
	screenGroup:insert(securityStat)

	roomTemp = display.newImage("thermometer.png")
	roomTemp:scale(.5, .5)
	roomTemp.x = 175
	roomTemp.y = 225
	screenGroup:insert(roomTemp)

	pointer = display.newImage("pointer.png")
	pointer:scale(.4, .5)
	pointer.x = 176
	pointer.y = 225
	if (fileName == nil) then
			pointer:rotate(50)
	else
			pointer:rotate(65)
	end	
	screenGroup:insert(pointer)
	
	
	if (textMessage ~= nil) then
	textMessage:removeSelf()
	textMessage = nil
	end
	
	--{ "outside.txt", "bed.txt", "living.txt", "kitchen.txt", "bath.txt" }
	if (fileName == "living.txt") then
		textMessage = display.newText("Living Room Settings for Bill:", 100, 55, "Helvetica", 12 )
	elseif (fileName == "kitchen.txt") then
		textMessage = display.newText("Kitchen Settings for Bill:", 85, 55, "Helvetica", 12 )
	elseif (fileName == "bath.txt") then
		textMessage = display.newText("Bath Settings for Bill:", 75, 55, "Helvetica", 12 )
	elseif (fileName == "bed.txt") then
		textMessage = display.newText("Bedroom Settings for Bill:", 90, 55, "Helvetica", 12 )
	else
		textMessage = display.newText("House is Empty:", 65, 55, "Helvetica", 12 )
	end	
	textMessage:setFillColor( 255, 255, 255 )
	screenGroup:insert( textMessage )
	
end


-- Establish ftp server connection
local connection = ftp.newConnection{ 
                host = "ftp.octoleaf.com",
                user = "forproject@octoleaf.com", 
                password = "3Mse6099!", 
        }

		
function onDownloadSuccess(event)
        --print("File downloaded to " .. event.path)
		itemFound = true
end
 
local onError = function(event)
		itemFound = false
end

 
-- This function will check for files on the ftp server with a 10 second delay
function checkFile()

	for i=1,#textFileSearch do
		print( "Checking: ", textFileSearch[i] )
		connection:download{
			remoteFile = textFileSearch[i],
			localFile = textFileSearch[i],
			onSuccess = onDownloadSuccess(event),
			onError = onError,
		}
		
		if itemFound == true then 
			updateImages(textFileSearch[i])
			break
		elseif i == 5 and itemFound == false then
			updateImages(nil)
			break
		else
			print "boo"
		end	
	end
	
	timer.performWithDelay(5000, checkFile, 1)
end


-- The Following Section is used to display and "animate" buttons.  This can
-- later be expanded within the buttons' function listeners to conduct an action.

	local onStatusTouch = function( event )
		print "Placeholder for future functionality"
	end
	
	statusBtn = ui.newButton{
		defaultSrc = "STATUS.png",
		defaultX = 117,
		defaultY = 38,
		overSrc = "STATUSon.png",
		overX = 117,
		overY = 38,
		onEvent = onStatusTouch,
		id = "PlayButton",
		text = "",
		font = "Helvetica",
		textColor = { 255, 255, 255, 255 },
		size = 16,
		emboss = false
	}
	
	statusBtn.x = 400; statusBtn.y = 60
  	screenGroup:insert( statusBtn )
	
	
	local onProfilesTouch = function( event )
		print "Placeholder for future functionality"
	end
	
	profilesBtn = ui.newButton{
		defaultSrc = "PROFILES.png",
		defaultX = 117,
		defaultY = 38,
		overSrc = "PROFILESon.png",
		overX = 117,
		overY = 38,		
		onEvent = onProfilesTouch,
		id = "ProfilesButton",
		text = "",
		font = "Helvetica",
		textColor = { 255, 255, 255, 255 },
		size = 16,
		emboss = false
	}
	
	profilesBtn.x = 400; profilesBtn.y = 110
  	screenGroup:insert( profilesBtn )

	
	local settingsTouch = function( event )
		print "Placeholder for future functionality"
	end
	
	settingsBtn = ui.newButton{
		defaultSrc = "SETTINGS.png",
		defaultX = 117,
		defaultY = 38,
		overSrc = "SETTINGSon.png",
		overX = 117,
		overY = 38,	
		onEvent = settingsTouch,
		id = "SettingsButton",
		text = "",
		font = "Helvetica",
		textColor = { 255, 255, 255, 255 },
		size = 16,
		emboss = false
	}
	
	settingsBtn.x = 400; settingsBtn.y = 155
  	screenGroup:insert( settingsBtn )
	
	
	local helpTouch = function( event )
		print "Placeholder for future functionality"
	end
	
	helpBtn = ui.newButton{
		defaultSrc = "HELP.png",
		defaultX = 117,
		defaultY = 38,
		overSrc = "HELPon.png",
		overX = 117,
		overY = 38,	
		onEvent = helpTouch,
		id = "HelpButton",
		text = "",
		font = "Helvetica",
		textColor = { 255, 255, 255, 255 },
		size = 16,
		emboss = false
	}
	
	helpBtn.x = 400; helpBtn.y = 200
  	screenGroup:insert( helpBtn )
	
	
	local logoutTouch = function( event )
		print "Placeholder for future functionality"
	end
	
	logoutBtn = ui.newButton{
		defaultSrc = "LOGOUT.png",
		defaultX = 117,
		defaultY = 38,
		overSrc = "LOGOUTon.png",
		overX = 117,
		overY = 38,	
		onEvent = logoutTouch,
		id = "LogoutButton",
		text = "",
		font = "Helvetica",
		textColor = { 255, 255, 255, 255 },
		size = 16,
		emboss = false
	}
	
	logoutBtn.x = 400; logoutBtn.y = 245
  	screenGroup:insert( logoutBtn )

-- Now we'll check ftp for the status file...
checkFile()
	
end

main()
