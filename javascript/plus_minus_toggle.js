

  transformicons.add('.tcon') // add default behavior for all elements with the class .tcon
              .remove('.tcon-menu--xcross') // remove default behavior for the first icon
              .add('.tcon-menu--xcross', {
                  transform: "mouseover",
                  revert: "mouseout"
              }); // add new behavior for the first icon


