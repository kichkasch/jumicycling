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
               for node2 in node1.childNodes:
                    if node2.localName:
                        if node2.localName == "param":
                            print ("\t%s (%s)" %(node2.getAttribute('name'), node2.getAttribute('type'), ))
                        else:
                            print "\t" + node2.localName
                        for node3 in node2.childNodes:
                            print "\t\t" + node3.nodeValue
