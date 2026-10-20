
<div class="thumb-modern">
    <div class="tm-hero">
        @if ($portfolio->profile_picture)
            <img src="{{ $portfolio->profile_picture }}" alt="">
        @else
            <div class="tm-avatar"></div>
        @endif

        <div class="tm-name">
            <p>{{$portfolio->full_name}}</p>
        </div>
    </div>

    <div class="tm-content">
        <div class="tm-title">About Me</div>
        <div class="tm-line"></div>
        <div class="tm-line tm-short"></div>

        <div class="tm-title">My Skills</div>
        <div class="tm-skills">
            <span></span>
            <span></span>
            <span></span>
        </div>

        <div class="tm-title">Featured Projects</div>
        <div class="tm-projects">
            <div></div>
            <div></div>
        </div>
    </div>
</div>

<style>
.thumb-modern {
    min-height: 260px;
    background: #f3f4ff;
    font-family: Arial, sans-serif;
    color: #252858;
    overflow: hidden;
}
.tm-hero {
    padding: 17px;
    text-align: center;
    color: white;
    background: linear-gradient(120deg, #5146c7, #8275ed);
}
.tm-hero img,
.tm-avatar {
    width: 35px;
    height: 35px;
    object-fit: cover;
    border-radius: 50%;
    background: #c8c2ff;
    display: block;
    margin: 0 auto 7px;
}
.tm-name {
    font-size: 13px;
    font-weight: bold;
}


.tm-content {
    padding: 12px;
}
.tm-title {
    font-size: 10px;
    font-weight: bold;
    margin: 7px 0;
}
.tm-line {
    height: 4px;
    width: 90%;
    background: #d8d8ed;
    border-radius: 4px;
    margin: 5px 0;
}
.tm-short { width: 60%; }
.tm-skills {
    display: flex;
    gap: 5px;
}
.tm-skills span {
    width: 35px;
    height: 12px;
    border-radius: 4px;
    background: #d9d5ff;
}
.tm-projects {
    display: flex;
    gap: 7px;
}
.tm-projects div {
    height: 28px;
    flex: 1;
    border-radius: 5px;
    background: white;
    border: 1px solid #deddf7;
}
</style>
