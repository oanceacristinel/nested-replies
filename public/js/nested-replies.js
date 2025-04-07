app.initializers.add('oncdev-nested-replies', () => {
  // Așteptăm să se încarce toate postările
  app.postComponents.extend((Post) => {
    return class NestedReplies extends Post {
      oncreate(vnode) {
        super.oncreate(vnode);

        // Logica pentru extinderea/căderea răspunsurilor ierarhice
        this.initNestedReplies();
      }

      initNestedReplies() {
        const postElement = document.querySelector(`.Post-${this.attrs.post.id}`);
        
        if (postElement) {
          const replyButton = postElement.querySelector('.ReplyButton');
          
          if (replyButton) {
            replyButton.addEventListener('click', () => {
              // Logica pentru a adăuga un răspuns
            });
          }
        }
      }
    };
  });
});
