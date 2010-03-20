"""
JuMiCycling

Import of data from KIPINA XML File

Michael Pilgermann
GPL 3.0 or later
"""

import xml.dom.minidom

filename = "/home/michael/myFiles/cycling stats.xml.kipina"

dom = xml.dom.minidom.parse(filename)
for node in dom.childNodes:
   if node.localName == "traininglog":  # KIPINA root element
       for node1 in node.childNodes:
           if node1.localName == "workout": 
                print node1.localName
                entry = {}
                for node2 in node1.childNodes:
                    if node2.localName:
                        if node2.localName == "param":
                            attName = node2.getAttribute('name')
                            attType = node2.getAttribute('type')
                        else:
                            if node2.localName == "datetime":
                                attName = 'datetime'
                                attType = 'datetime'
                        if node2.childNodes:
                            attValue = node2.childNodes[0].nodeValue
                        else:
                            attValue = None
#                        print ("\t%s (%s) \t%s" %(attName, attType, unicode(attValue)))
                        entry[attName] = attValue
                print entry
