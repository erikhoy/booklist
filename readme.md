<h2>## Coding Assignment for booj: Book Reading List</h2>

<p>This coding assignment utilizes Laravel 5.6 to keep track of a user's reading list. The user may add, remove books to or from the list. They may edit and view individual books. The books/add page allows the user to enter the Title, Author, Publication Date and select an Image to upload. Upon creation, the book is given a reading priority equal to the last record id+1. The info is stored in a database, and the image is stored in the public/images directory. They may edit this information on the books/edit page, and view the image and the book information on the books/view page. The books/delete page deletes the book from the list.

I used the jQuery sortable() function to change the order of the books in the list. When the book record is dropped in the new list location, the priority field is updated accordingly in the database. I used a third party provider called column-sortable to sort the columns of the book list by Author, Title and Publication Date. (One 'bug' that is not really a bug, is that when you have clicked on any of the sort links, then change the order of the list, then click refresh, it will appear the priority level has not changed. However, if you remove the GET variables from the url, so it just reads .../books, then you will see the changes.)</p>