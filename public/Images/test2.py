import requests,urllib
from bs4 import BeautifulSoup

#print soup.prettify().encode('utf-8')
def request(url):
	r = requests.get(url.strip())
	return BeautifulSoup(r.content,'lxml')
def crawl_img(soup):
	img_link=soup.find('div',{'class':'big_book'}).find('img').get('src')
	img_name = get_id(url)+'.'+img_link.split('/')[-1].split('.')[-1]	
	urllib.urlretrieve(img_link, img_name)
def get_id(url):
	return url.split('-')[-1].split('.')[0]
def insert_ti_db_categories(soup,f):
	kinds=soup.find_all('li',{'class':'kind-book '})
	for x in xrange(0,len(kinds)):
		f.write("insert into categories(name) values("+x.text+")")

def insert_to_db_book(id,title,tac_gia,gia_bia,gia_ban,luot_doc,id_kind,f):


f=open("link.txt","r")
for url in f:
	soup=request(url)
	id1 = get_id(url)
	author = soup.select('.author')	
	title = soup.select('.name_info')[0].text.strip().encode('utf-8') #title
	tac_gia = author[0].find('b').text.strip().encode('utf-8') #ten tac gia
	gia_bia = author[1].find('b').text.strip().encode('utf-8') #gia bia
	gia_ban = author[2].find('b').text.strip().encode('utf-8') #gia ban
	luot_doc = author[3].find('b').text.strip().encode('utf-8') #luot doc
	insert_to_db_book(id,title,tac_gia,gia_bia,gia_ban,luot_doc,id_kind,f)
	#gioi thieu	
	descibe = soup.select('.box_text_details')
	print descibe#.prettify().encode('utf-8')
f.close()