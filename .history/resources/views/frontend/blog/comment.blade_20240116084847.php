<div class="replay-box">
    <div class="row">
        <div class="col-sm-12">
            <h2>Leave a replay</h2>
            <form method="POST">
                @csrf
            <div class="text-area">
                <div class="blank-arrow">
                    <label>Your Name</label>
                </div>
                <span>*</span>
                <textarea name="comment" rows="11"></textarea>
                <button type="submit">Submit</button>
            </div>
        </form>
        </div>
    </div>
</div><!--/Repaly Box-->
