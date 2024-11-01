document.addEventListener('DOMContentLoaded', function () {

    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    const formElement = document.querySelector('#form-review');

    if (!formElement) return;

    formElement.addEventListener('submit', function (event) {
        event.preventDefault();

        const rating = document.querySelector('input[name="rating"]');
        const comment = document.querySelector('textarea[name="review"]');
        const ratingError = document.getElementById('rating-error');
        const commentError = document.getElementById('comment-error');

        if (!rating || !comment) return;
        if (!ratingError || !commentError) return;

        const ratingValue = rating.value;
        const commentValue = comment.value;

        const reviewData = {
            id_product: 1,
            rating: ratingValue,
            comment: commentValue,
        }

        fetch('/submit-review', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': csrfToken
            },
            body: JSON.stringify(reviewData)
        })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    const reviewContainer = document.querySelector('#review-info');
                    const newReviewHtml = `
                                    <div class="flex-w flex-t p-b-68">
                                        <div class="wrap-pic-s size-109 bor0 of-hidden m-r-18 m-t-6">
                                            <img src="images/avatar-01.jpg" alt="AVATAR">
                                        </div>

                                        <div class="size-207">
                                            <div class="flex-w flex-sb-m p-b-17">
                                                <span class="mtext-107 cl2 p-r-20">
                                                    ${data.customer.name}
                                                </span>

                                                <span class="fs-18 cl11">
                                                     ${'<i class="zmdi zmdi-star"></i>'.repeat(data.review.rating)}
                                                </span>
                                            </div>

                                            <p class="stext-102 cl6">
                                                ${data.review.comment}
                                            </p>
                                        </div>
                                    </div>`;
                    reviewContainer.innerHTML += newReviewHtml;

                    // reset form sau khi gui thanh cong
                    ratingError.innerText = '';
                    commentError.innerText = '';
                    formElement.reset();
                } else if (data.errors) {
                    if (data.errors.rating) {
                        ratingError.innerText = data.errors.rating[0];
                    }
                    if (data.errors.comment) {
                        commentError.innerText = data.errors.comment[0];
                    }
                }
            })
            .catch(error => console.log('Error: ', error))
    });
});