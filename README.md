Name: Louis Wilbrink

Date: 7/18/2012

Project: Project0

Notes:

Evaluate in Chrome and Firefox.

Design:

Design based on Bootstrap CSS.

Chose to use a text box for quantity.  Straight-forward and allows unlimited number.

Used hidden form inputs to track the item name, size, and price.  This information was $_POST-ed to the next page and processed to the $_SESSION superglobal.

Focused on usability and simple, intuitive layout.  Menu navigation on the left, Menu display in the center, and the shopping cart docked on the right.

Features:

Does not display the entire menu on one page.  Splits according to category.

Converts Three items per category into DOM.

Customer is able to delete any order they desire, and reorder the correct amount.

Website displays the shopping cart contents at all times.  Generates final shopping cart purchase at checkout.

The customer is given a clear link for checkout.  The customer is given the total of their purchase, and thanked for their patronage.

Only HTML and CSS files are in the html folder.  Server-side content, such as the XML file, is stored in project0/content.

Design handled by Bootstrap.

xml validated with validator.wc.org

Reporting orders uses correct pluralization.

After checkout, customers are allowed to start a new order/session.

Any changes to price fluxuation of existing menu items will automatically translate to the website.

Error Checking:

Checks to see if an order has a numeric quantity.  If not, the $_POST data is never saved into the current $_SESSION.
