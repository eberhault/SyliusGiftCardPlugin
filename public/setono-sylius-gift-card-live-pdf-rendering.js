document.addEventListener('DOMContentLoaded', () => {
    document
        .querySelectorAll('.js-ssgc-apply-pdf-changes')
        .forEach((element) => {
            element.addEventListener('click', async (event) => {
                event.preventDefault();

                const response = await fetch(element.dataset.url, {
                    method: 'POST',
                    body: new URLSearchParams(
                        new FormData(
                            document.querySelector(
                                'form[name="setono_sylius_gift_card_gift_card_configuration"]'
                            )
                        )
                    ),
                });

                const pdf = await response.text();

                document.querySelector('.js-ssgc-live-render-container').innerHTML = `
                    <embed id="js-ssgc-live-render-box"
                           src="data:application/pdf;base64,${pdf}"
                           style="width:100%;height:100%;">
                `;
            });
        });
});
