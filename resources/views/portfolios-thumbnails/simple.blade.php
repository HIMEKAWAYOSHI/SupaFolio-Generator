
<div class="thumb-simple">
    <div class="ts-header">
        @if ($portfolio->profile_picture)
            <img src="{{ $portfolio->profile_picture }}" alt="">
        @else
            <div class="ts-avatar"></div>
        @endif

        <div class="ts-heading">
            <div class="ts-name">
                <p>{{$portfolio->full_name}}</p>
            </div>
        </div>
    </div>

    <div class="ts-divider"></div>

    <div class="ts-section-title">About Me</div>
    <div class="ts-line ts-long"></div>
    <div class="ts-line ts-medium"></div>

    <div class="ts-section-title">Skills</div>
    <div class="ts-skills">
        <span></span>
        <span></span>
        <span></span>
    </div>

    <div class="ts-section-title">Projects</div>
    <div class="ts-line ts-long"></div>
</div>

<style>
.thumb-simple {
    box-sizing: border-box;
    min-height: 260px;
    padding: 22px;
    background: #fff;
    color: #333;
    font-family: Arial, sans-serif;
    border: 1px solid #eee;
}
.ts-header {
    display: flex;
    align-items: center;
    gap: 10px;
}
.ts-header img,
.ts-avatar {
    width: 38px;
    height: 38px;
    border-radius: 50%;
    object-fit: cover;
    background: #e8e8e8;
    flex-shrink: 0;
}
.ts-name {
    font-size: 13px;
    font-weight: bold;
}


.ts-divider {
    height: 1px;
    background: #eee;
    margin: 14px 0;
}
.ts-section-title {
    font-size: 10px;
    font-weight: bold;
    margin: 12px 0 7px;
}
.ts-line {
    height: 4px;
    background: #e9e9e9;
    border-radius: 4px;
    margin: 5px 0;
}
.ts-long { width: 90%; }
.ts-medium { width: 65%; }
.ts-skills {
    display: flex;
    gap: 5px;
}
.ts-skills span {
    width: 35px;
    height: 12px;
    background: #eee;
    border-radius: 3px;
}
</style>
